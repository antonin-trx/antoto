/*
** EPITECH PROJECT, 2022
** strdup
** File description:
** dup a str
*/

#include <stdlib.h>

int my_strlen(char const *str);
char *my_strcpy(char *dest, char const *src);
void my_putstr(char const *str);

char *my_strdup(char const *src)
{
    char *c;

    c = malloc(sizeof(char) * (my_strlen(src) + 1));
    if (c == NULL) {
        return (NULL);
    }
    my_strcpy(c, src);
    return (c);
}
