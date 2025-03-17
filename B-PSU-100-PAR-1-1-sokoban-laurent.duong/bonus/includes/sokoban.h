/*
** EPITECH PROJECT, 2022
** include
** File description:
** sokoban
*/

#ifndef SOKOBAN_H_
    #define SOKOBAN_H_

    #include <fcntl.h>
    #include <stdlib.h>
    #include <unistd.h>
    #include <curses.h>
    #include <sys/stat.h>

    #define SPACE 32

typedef struct coord {
    int x;
    int y;
} coord;

typedef struct s_sokoban {
    char **map;
    int key;
    int is_running;
    int target_count;
    int score;
    coord map_size;
    coord player_pos;
    coord *target_pos;
} sokoban;

char *get_next_line(int fd);
char *get_next_line2(int fd);
void my_putstr(char *str);
void move_down(sokoban *s);
char **init_map(char *filename, sokoban *target);
int my_strcmp(char *s1, char *s2);
void get_pos(sokoban *s);
char *convert_int(int nb);
int my_strlen(char *str);
int count_line(char *filename, struct stat st);
void handle_input(sokoban *s);
void move_entity(sokoban *s, coord *position, int direction);

#endif
