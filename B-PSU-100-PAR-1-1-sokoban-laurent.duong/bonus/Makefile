##
## EPITECH PROJECT, 2022
## Makefile
## File description:
## a
##

NAME		=	my_sokoban			\

NAME_TEST	=	unit_test			\

SRC		=	sokoban.c			\
			get_next_line.c			\
			create_map.c			\
			handle_input.c			\
			move_player.c			\
			get_next_line2.c		\
			convert_int.c			\
			get_pos.c			\
			my_strndup.c			\
			my_strcmp.c			\
			my_strlen.c			\
			my_strncat.c			\
			my_putstr.c			\
			my_putchar.c			\
			my_strcpy.c			\
			my_strncpy.c

MAIN_TEST	=	tests/test_printf.c		\

OBJ		=	$(SRC:.c=.o)			\

OBJ_TEST	=	$(SRC) $(MAIN_TEST)		\

INCLUDE		=	-I./includes			\

CRITERION	=	-lcriterion --coverage		\

CPPFLAGS	=	-I./includes			\

all:	$(OBJ)
		gcc -o $(NAME) $(OBJ) -lncurses

test_run:	$(OBJ_TEST)
		gcc -o $(NAME_TEST) $(OBJ_TEST) $(INCLUDE) $(CRITERION)
		./$(NAME_TEST)
		gcovr -e tests/ -e lib/
		gcovr -b -e tests/ -e lib/

clean:
		rm -f $(OBJ)

fclean:	clean
		rm -f $(NAME) $(OBJ)
		rm -f *.o
		rm -f *.gcda
		rm -f *.gcno
		rm -f *~
		rm -f ./includes/*~

re:		fclean all
		@echo -e "\e[1;31mCompiled With Success\e[0m"

.PHONY:	clean fclean re all	test_run test_cov\
