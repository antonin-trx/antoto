/*
** EPITECH PROJECT, 2022
** hehehe
** File description:
** hahah
*/

#include "sokoban.h"

int count_line(char *filename, struct stat st)
{
    int line = 0;
    int i = 0;
    int fd = open(filename, O_RDONLY);
    int nb_read = 1;
    char buffer[st.st_size];

    while (nb_read != 0) {
        nb_read = read(fd, buffer, sizeof(buffer));
        while (i < nb_read) {
            line += (buffer[i] == '\n');
            i += 1;
        }
    }
    close(fd);
    return (line);
}

int is_line_valid(char *s)
{
    int i;

    i = 0;
    while (s[i] != '\0') {
        if (s[i] != '#' && s[i] != 'O' && s[i] != 'X'
                && s[i] != ' ' && s[i] != 'P')
            return 0;
        i += 1;
    }
    return 1;
}

void count_t(sokoban *target, char *str)
{
    int i = 0;

    while (str[i] != '\0') {
        if (str[i] == 'O') {
            target->target_count += 1;
        }
        i += 1;
    }
}

char **create_map(int fd, sokoban *s)
{
    int i = 0;
    char *str;
    char **map = malloc((s->map_size.y + 1) * sizeof(*map));
    int line_size;

    s->map_size.x = 0;
    while ((str = get_next_line(fd)) != 0) {
        if (is_line_valid(str) == 0) {
            free(map);
            return 0;
        }
        line_size = my_strlen(str);
        s->map_size.x = line_size > s->map_size.x ? line_size : s->map_size.x;
        count_t(s, str);
        map[i] = str;
        i += 1;
    }
    return (map);
}

char **init_map(char *filename, sokoban *s)
{
    int fd;
    int nb_line = 0;
    char **map;
    struct stat st;

    if (stat(filename, &st) == -1)
        return 0;
    s->map_size.y = count_line(filename, st);
    fd = open(filename, O_RDONLY);
    map = create_map(fd, s);
    close(fd);
    return map;
}
