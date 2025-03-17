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
    char **base_map;
    int key;
    int is_running;
    int target_count;
    int box_count;
    int score;
    coord map_size;
    coord player_pos;
    coord *target_pos;
    coord *box_pos;
} sokoban;

char *get_next_line(int fd);
char *get_next_line2(int fd);
void my_putstr(char *str);
int my_strlen(char *s);
int my_strcmp(char *s1, char *s2);
void move_down(sokoban *s);
char *convert_int(int nb);
void duplicate_map(char **src, char ***dest, int map_size);
void init_map(char *filename, sokoban *target);
int count_line(char *filename, struct stat st);
void check_first_line(sokoban *s);
void handle_input(sokoban *s);
int move_entity(sokoban *s, coord *position, int direction);
int is_loose(sokoban *s);
void check_last_line(sokoban *s, int nb_line);
void check_first_line(sokoban *s);
void get_pos(sokoban* s);
char *my_strdup(char const *src);
int is_on_target(sokoban *s, int x, int y);

#endif
