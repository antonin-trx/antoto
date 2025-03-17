/*
** EPITECH PROJECT, 2022
** cmp
** File description:
** cmp str
*/

char lowerc(char str)
{
    if (str >= 'A' && str <= 'Z') {
        str += 32;
    }
    return (str);
}

int my_strcmp(char *s1, char *s2)
{
    int i = 0;
    int res = 0;

    while (lowerc(s1[i]) == lowerc(s2[i]) && s1[i] != '\0' && s2[i] != '\0') {
        i += 1;
    }
    res = lowerc(s1[i]) - lowerc(s2[i]);
    if (res > 0)
        return (1);
    if (res == 0)
        return (0);
    if (res < 0)
        return (-1);
}
