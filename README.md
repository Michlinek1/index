import turtle
window = turtle.Screen()
#create a ball
ball = turtle.Turtle()
ball.shape("circle")
ball.color("red")
ball.speed(0)
ball.penup()
ball.goto(0,0)
ball.dx = 0.5
ball.dy = 0.5

#create a player
player = turtle.Turtle()
player.shape("square")
player.color("blue")
player.speed(0)
player.penup()
player.goto(0,-250)
player.dx = 0
player.dy = 0


#create a movement
def move_left():
    player.dx = -3
def move_right():
    player.dx = 3
def move_up():
    player.dy = 3
def move_down():
    player.dy = -3

#when button is pressed, call the function
window.listen()
window.onkeypress(move_left, "Left")
window.onkeypress(move_right, "Right")
window.onkeypress(move_up, "Up")
window.onkeypress(move_down, "Down")

#when the ball touches the player, the ball moves
while True:
    window.update()
    ball.setx(ball.xcor() + ball.dx)
    ball.sety(ball.ycor() + ball.dy)
    if ball.ycor() > 250:
        ball.sety(250)
        ball.dy *= -1
    if ball.ycor() < -250:
        ball.sety(-250)
        ball.dy *= -1
    if ball.xcor() > 250:
        ball.setx(250)
        ball.dx *= -1
    if ball.xcor() < -250:
        ball.setx(-250)
        ball.dx *= -1
    if ball.xcor() < -250 and ball.ycor() < -250:
        ball.setx(-250)
        ball.sety(-250)
        ball.dx *= -1
        ball.dy *= -1
    if ball.xcor() > 250 and ball.ycor() > 250:
        ball.setx(250)
        ball.sety(250)
        ball.dx *= -1
        ball.dy *= -1
    if ball.xcor() < -250 and ball.ycor() > 250:
        ball.setx(-250)
        ball.sety(250)
        ball.dx *= -1
        ball.dy *= -1
    if ball.xcor() > 250 and ball.ycor() < -250:
        ball.setx(250)
        ball.sety(-250)
        ball.dx *= -1
        ball.dy *= -1
    if ball.xcor() < -250 and ball.ycor() < -250:
        ball.setx(-250)
        ball.sety(-250)
        ball.dx *= -1
        ball.dy *= -1
    if ball.xcor() < -250 and ball.ycor() > 250:
        ball.setx(-250)
        ball.sety(250)
        ball.dx *= -1
        ball.dy *= -1
    if ball.xcor() > 250 and ball.ycor() < -250:
        ball.setx(250)
        ball.sety(-250)
        ball.dx *= -1
        ball.dy *= -1


turtle.done()


    












