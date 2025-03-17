/*
** EPITECH PROJECT, 2022
** soko
** File description:
** ban
*/

#include "sokoban.h"

void display_map(sokoban *s, char *map_name)
{
    int i = 0;
    char *score = convert_int(s->score);

    clear();
    if (s->map_size.x + 1 > COLS || (s->map_size.y + 3) > LINES)
        mvprintw(LINES / 2 - 1, (COLS / 2) - 8, "Window too small");
    else {
        printw(map_name);
        printw("\n\n");
        while (s->map[i] != 0) {
            printw(s->map[i]);
            printw("\n");
            i += 1;
        }
        printw("move : ");
        printw(score);
    }
}

void update_map(sokoban *s)
{
    int i = 0;

    move_entity(s, &s->player_pos, s->key);
    s->is_running = 0;
    while (i != s->target_count) {
        if (s->map[s->target_pos[i].y][s->target_pos[i].x] == ' ')
            s->map[s->target_pos[i].y][s->target_pos[i].x] = 'O';
        s->is_running |= s->map[s->target_pos[i].y][s->target_pos[i].x] == 'O';
        i += 1;
    }
}

int run_game(sokoban *s_soko, int fd)
{
    char *map_name;

    s_soko->score = 1;
    while ((map_name = get_next_line2(fd)) != 0) {
        if ((s_soko->map = init_map(map_name, s_soko)) == 0) {
            write(2, "Map is invalid.\n", 16);
            return 84;
        }
        get_pos(s_soko);
        s_soko->is_running = 1;
        while (s_soko->is_running == 1) {
            update_map(s_soko);
            display_map(s_soko, map_name);
            handle_input(s_soko);
        }
        s_soko->score = 0;
    }
    return 0;
}

int display_help(void)
{
    my_putstr(
            "USAGE\n"
            "     ./my_sokoban map\n"
            "DESCRIPTION\n"
            "     map file representing the warehouse map, containing "
            "'#' for walls,\n"
            "         'P' for the player, 'X' for the boxes and '0' for "
            "storage locations.\n");
    return 84;
}

int main(int ac, char **av)
{
    sokoban s_soko;
    int fd;

    if (ac != 2)
        return 84;
    if (my_strcmp(av[1], "-h") == 0)
        return display_help();
    if ((fd = open(av[1], O_RDONLY)) == -1)
        return 84;
    initscr();
    keypad(stdscr, TRUE);
    noecho();
    if (run_game(&s_soko, fd) == 84) {
        close(fd);
        endwin();
        return 84;
    }
    close(fd);
    endwin();
    return 0;
}
