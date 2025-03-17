/*
** EPITECH PROJECT, 2022
** move
** File description:
** player
*/

#include "sokoban.h"

coord compute_new_position(coord position, int direction)
{
    coord new_position = { -1, -1 };

    switch (direction) {
        case (KEY_UP):
            new_position.x = position.x;
            new_position.y = position.y - 1;
            break;
        case (KEY_DOWN):
            new_position.x = position.x;
            new_position.y = position.y + 1;
            break;
        case (KEY_LEFT):
            new_position.x = position.x - 1;
            new_position.y = position.y;
            break;
        case (KEY_RIGHT):
            new_position.x = position.x + 1;
            new_position.y = position.y;
    }
    return new_position;
}

int is_box(sokoban *s, coord *position)
{
    return s->map[position->y][position->x] == 'X';
}

int move_entity(sokoban *s, coord *position, int direction)
{
    coord new_position = compute_new_position(*position, direction);

    if (new_position.x == -1)
        return 0;
    if (s->map[new_position.y][new_position.x] == ' ' ||
        s->map[new_position.y][new_position.x] == 'O') {
        s->map[new_position.y][new_position.x] =
        s->map[position->y][position->x];
        s->map[position->y][position->x] = ' ';
        *position = new_position;
        s->score += 1;
        return 1;
    } else if (is_box(s, position) == 0
            && s->map[new_position.y][new_position.x] == 'X') {
        move_entity(s, &new_position, direction) == 1 &&
            move_entity(s, position, direction);
        s->score += 1;
    }
    return 0;
}
