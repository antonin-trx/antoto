/*
** EPITECH PROJECT, 2022
** strdup
** File description:
** dup a str
*/

#include<stdlib.h>

int my_strlen(char const *str);
char *my_strncpy(char *dest, char const *src, size_t n);
void my_putstr(char const *str);

char *my_strndup(char const *src, size_t n)
{
    char *c;

    c = malloc(sizeof(char) * (my_strlen(src) + 1));
    if (c == NULL) {
        return (NULL);
    }
    my_strncpy(c, src, n);
    return (c);
}
