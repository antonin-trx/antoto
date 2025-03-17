/*
** EPITECH PROJECT, 2022
** tamer
** File description:
** tamer
*/

#include "sokoban.h"

int is_on_target(sokoban *s, int x, int y)
{
    int i = 0;

    while (i < s->target_count) {
        if (s->target_pos[i].x == x && s->target_pos[i].y == y) {
            return 1;
        }
        i += 1;
    }
    return 0;
}
