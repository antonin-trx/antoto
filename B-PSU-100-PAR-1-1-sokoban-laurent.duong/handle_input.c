/*
** EPITECH PROJECT, 2022
** gg
** File description:
** rrr
*/

#include "sokoban.h"

void reset_game(sokoban *s)
{
    int i = 0;

    while (i < s->map_size.y) {
        free(s->map[i]);
        i += 1;
    }
    free(s->map);
    free(s->target_pos);
    duplicate_map(s->base_map, &s->map, s->map_size.y);
    get_pos(s);
}

void handle_input(sokoban *s)
{
    s->key = getch();
    if (s->key == SPACE) {
        reset_game(s);
    }
}
