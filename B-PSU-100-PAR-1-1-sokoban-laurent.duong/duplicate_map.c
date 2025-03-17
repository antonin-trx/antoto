/*
** EPITECH PROJECT, 2022
** duplicate
** File description:
** duplicate
*/

#include "sokoban.h"

void duplicate_map(char **src, char ***dest, int map_size)
{
    int i = 0;

    *dest = malloc(sizeof(*dest) * (map_size + 1));
    (*dest)[map_size] = 0;
    while (i < map_size) {
        (*dest)[i] = my_strdup(src[i]);
        i += 1;
    }
}
