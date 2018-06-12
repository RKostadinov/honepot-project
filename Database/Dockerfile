# Use official ubuntu 16.04
FROM ubuntu:16.04

# Update & upgrade ubuntu
RUN apt-get update
RUN apt-get upgrade -y

# Install git
RUN apt-get install git -y

# Clone git repo
RUN git clone https://github.com/RKostadinov/honepot-project.git

# Make port 3306 available to the world outside this container
EXPOSE 3306

# Run start-up.sh when the container launches
CMD ["/honepot-project/Database/start-up.sh"]