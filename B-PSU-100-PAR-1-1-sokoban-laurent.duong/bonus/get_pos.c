/*
** EPITECH PROJECT, 2022
** get pos
** File description:
** position
*/

#include "sokoban.h"

void get_pos_entity(sokoban *s, int y, int x, int *i)
{
    if (s->map[y][x] == 'P') {
        s->player_pos.x = x;
        s->player_pos.y = y;
    } else if (s->map[y][x] == 'O') {
        s->target_pos[*i].x = x;
        s->target_pos[*i].y = y;
        *i += 1;
    }
}

void get_pos(sokoban *s)
{
    int x = 0;
    int y = 0;
    int i = 0;

    s->target_pos = malloc(s->target_count * sizeof(*s->target_pos));
    while (s->map[y] != 0) {
        x = 0;
        while (s->map[y][x] != '\0') {
            get_pos_entity(s, y, x, &i);
            x += 1;
        }
        y += 1;
    }
}
