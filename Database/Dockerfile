FROM ubuntu:16.04

RUN apt-get update
RUN apt-get upgrade -y
RUN apt-get install git -y

RUN git clone https://github.com/RKostadinov/honepot-project.git

CMD ["/honepot-project/Database/start-up.sh"]