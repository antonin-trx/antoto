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
    char *score_str;

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
        score_str = convert_int(s->score);
        printw("move : ");
        printw(score_str);
        free(score_str);
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
        s->is_running |=
                (s->map[s->target_pos[i].y][s->target_pos[i].x] == 'O' ||
                s->map[s->target_pos[i].y][s->target_pos[i].x] == 'P');
        i += 1;
    }
}

void run_game(sokoban *s_soko, char *map_name)
{
    s_soko->is_running = 1;
    while (s_soko->is_running == 1 && is_loose(s_soko) == 0) {
        update_map(s_soko);
        if (s_soko->is_running == 1 && is_loose(s_soko) == 0) {
            display_map(s_soko, map_name);
            handle_input(s_soko);
        }
    }
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
    char *map_name;
    sokoban s_soko;

    if (ac != 2)
        return 84;
    map_name = av[1];
    if (my_strcmp(map_name, "-h") == 0)
        return display_help();
    init_map(map_name, &s_soko);
    if (s_soko.map == 0) {
        write(2, "map is invalid.\n",  16);
        return 84;
    }
    get_pos(&s_soko);
    initscr();
    keypad(stdscr, TRUE);
    noecho();
    run_game(&s_soko, map_name);
    endwin();
    return (0);
}
