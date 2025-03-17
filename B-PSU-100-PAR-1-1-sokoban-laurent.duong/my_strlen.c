/*
** EPITECH PROJECT, 2022
** my_strlen
** File description:
** count number of char in the string
*/

int my_strlen(char const *str)
{
    int i = 0;

    while (str[i] != '\0') {
        i++;
    }
    return (i);
}
