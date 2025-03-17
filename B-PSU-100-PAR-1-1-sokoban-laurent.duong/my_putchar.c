/*
** EPITECH PROJECT, 2022
** dd
** File description:
** dd
*/

#include <unistd.h>

void my_putchar(char c)
{
    write(1, &c, 1);
}
