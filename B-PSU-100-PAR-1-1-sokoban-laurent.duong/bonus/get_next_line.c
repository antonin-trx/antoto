/*
** EPITECH PROJECT, 2022
** get
** File description:
** next
*/

#include "get_next_line.h"

int is_back_to_line(char *buffer, int size)
{
    int i = 0;

    while (i != size) {
        if (buffer[i] == '\n') {
            return (i);
        }
        i += 1;
    }
    return (-1);
}

char *concat_line(char *dest, char *str, int size)
{
    char *mem;

    if (dest == 0) {
        mem = my_strndup(str, size);
    } else {
        mem = malloc((my_strlen(dest) + size + 1) * sizeof(*mem));
        mem = my_strcpy(mem, dest);
        mem = my_strncat(mem, str, size);
    }
    return (mem);
}

char *get_next_line(int fd)
{
    static char buffer[15];
    static int i = 0;
    static int nb_read = 0;
    int end_line = 0;
    char *str = 0;

    if (i == nb_read) {
        nb_read = read(fd, buffer, sizeof(buffer));
        i = 0;
    }
    if (nb_read == 0)
        return (0);
    while ((end_line = is_back_to_line(&buffer[i], (nb_read - i))) == -1) {
        str = concat_line(str, &buffer[i], nb_read - i);
        i = 0;
        nb_read = read(fd, buffer, sizeof(buffer));
    }
    str = concat_line(str, &buffer[i], end_line);
    i += end_line + 1;
    return (str);
}
