/*
** EPITECH PROJECT, 2022
** str cat
** File description:
** concat str
*/

int my_strlen(char *str);

char *my_strncat(char *dest, char const *src, int nb)
{
    int i = 0;
    char *c = dest + my_strlen(dest);

    while (src[i] != '\0' && nb > 0) {
        c[i] = src[i];
        nb -= 1;
        i += 1;
    }
    c[i] = '\0';
    return (dest);
}
