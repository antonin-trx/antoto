/*
** EPITECH PROJECT, 2022
** my_put_nbr
** File description:
** print nb
*/

#include <stdlib.h>

int get_length(int nb)
{
    int div = 10;
    int length = 0;

    while (nb > 0) {
        nb = nb / div;
        length += 1;
    }
    return (length);
}

int my_power(int nb, int power)
{
    int nb2 = nb;

    while (power > 1) {
        nb = nb * nb2;
        power -= 1;
    }
    return (nb);
}

char *convert_int(int nb)
{
    int i;
    int j = 0;
    int length = get_length(nb);
    int divisor = length > 1 ? my_power(10, length - 1) : 1;
    char *str = malloc((length + 1) * sizeof(*str));

    while (divisor > 0) {
        i = nb / divisor;
        i = i % 10;
        i = i + 48;
        str[j] = i;
        divisor = divisor / 10;
        j += 1;
    }
    str[j] = '\0';
    return (str);
}
