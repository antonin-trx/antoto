/*
** EPITECH PROJECT, 2022
** gg
** File description:
** rrr
*/

#include "sokoban.h"

void handle_input(sokoban *s)
{
    s->key = getch();
    s->is_running = s->is_running == 1 && s->key != SPACE;
}
