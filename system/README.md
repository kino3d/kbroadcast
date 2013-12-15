# System configuration 

- interfaces
- wifi hostadp-minimal.conf
- init nginx
- nginx conf
- different video in confs gstreamer,blackmagic,usb cam
- compilation conf

# Install Ubuntu linux server 13.04
- install build essential 
-   sudo apt-get -y install autoconf automake build-essential git libass-dev libgpac-dev   libsdl1.2-dev libtheora-dev libtool libva-dev libvdpau-dev libvorbis-dev libx11-dev   libxext-dev libxfixes-dev pkg-config texi2html zlib1g-dev  
-  add the user: stream / password: stream  
- sudo adduser stream 
  enter as user: stream pass: stream  
-   make a "devel" directory: mkdir develand cd inside  
-   mkdir devel  
-  cd devel  
 
# nginx
- make a "nginx" directory and cd inside
- mkdir nginx
- cd nginx

- Compiling nginx
  ./configure --prefix=/usr --with-http_ssl_module --add-module=../nginx-rtmp-module --conf-path=/etc/nginx/nginx.conf --http-log-path=/var/log/nginx/access.log --pid-path=/run/nginx.pid --error-log-path=/var/log/nginx/error.log   

# libav
-  Compiling libav  
  ./configure --prefix=/usr --enable-gpl --enable-version3 --enable-nonfree --enable-librtmp --enable-libx264 --enable-libmp3lame --enable-libfaac --disable-debug   


# bmdtools

