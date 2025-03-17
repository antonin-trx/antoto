/*
** EPITECH PROJECT, 2022
** get_next_line
** File description:
** include proto
*/

#ifndef GET_NEXT_LINE_H_
    #define GET_NEXT_LINE_H_

    #include <fcntl.h>
    #include <unistd.h>
    #include <string.h>
    #include <stdlib.h>
    #include <sys/stat.h>

char *my_strncpy(char *dest, char *str, size_t n);
char *my_strcat(char *dest, char const *src);
char *my_strncat(char *dest, char const *src, int n);
char *my_strcpy(char *dest, char *str);
void my_put_nbr(int nb);
int my_strlen(char *str);
char *my_strndup(char const *src, size_t n);
char *my_strdup(char const *src);

#endif
