/*
** EPITECH PROJECT, 2022
** is
** File description:
** is loose
*/

#include "sokoban.h"

int is_free(char c)
{
    return c == ' ' || c == 'O' || c == 'P';
}

int is_box_movable(sokoban *s, coord *box)
{
    int x = box->x;
    int y = box->y;

    return (is_free(s->map[box->y][box->x + 1]) &&
            is_free(s->map[box->y][box->x - 1])) ||
            (is_free(s->map[box->y + 1][box->x]) &&
            is_free(s->map[box->y - 1][box->x]));
}

int count_movable_boxes(sokoban *s, int y)
{
    coord c;
    int x = 0;
    int movable_boxes = 0;

    while (s->map[y][x] != 0) {
        c.x = x;
        c.y = y;
        if (s->map[y][x] == 'X' && is_box_movable(s, &c) == 1) {
            movable_boxes += 1;
        }
        x += 1;
    }
    return movable_boxes;;
}

int is_loose(sokoban *s)
{
    int x;
    int y;
    int movable_boxes = 0;

    y = 0;
    while (s->map[y] != 0) {
        movable_boxes += count_movable_boxes(s, y);
        y += 1;
    }
    return movable_boxes == 0;
}
