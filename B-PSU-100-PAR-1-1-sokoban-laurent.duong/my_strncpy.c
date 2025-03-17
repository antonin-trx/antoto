/*
** EPITECH PROJECT, 2022
** cpy
** File description:
** coy
*/

#include <stddef.h>

char *my_strncpy(char *dest, char const *src, size_t n)
{
    int i = 0;

    while (src[i] != '\0' && n != 0) {
        dest[i] = src[i];
        i += 1;
        n -= 1;
    }
    dest[i] = '\0';
    return (dest);
}
