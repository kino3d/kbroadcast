# System configuration

- interfaces
- wifi hostadp-minimal.conf
- init nginx
- nginx conf
- different video in confs gstreamer,blackmagic,usb cam
- compilation conf

# Install linux server 
- After system install
- sudo apt-get -y install autoconf automake build-essential git libass-dev libgpac-dev   libsdl1.2-dev libtheora-dev libtool libva-dev libvdpau-dev libvorbis-dev libx11-dev libmp3lame-dev libxext-dev libxfixes-dev pkg-config texi2html zlib1g-dev ningx-common

- sudo adduser stream
  enter as user: stream pass: stream
-   make a "devel" directory:
-   mkdir devel
-  cd devel

# Compiling nginx
- mkdir nginx
- cd nginx
- wget http://nginx.org/download/http://nginx.org/download/nginx-1.9.9.tar.gz (or whatever version is the current stable)
- tarxvzf nginx-1.9.9.tar.gz
- git clone https://github.com/arut/nginx-rtmp-module.git
- cd nginx-1.9.9
-  ./configure --prefix=/usr --with-http_ssl_module --add-module=../nginx-rtmp-module --conf-path=/etc/nginx/nginx.conf --http-log-path=/var/log/nginx/access.log --pid-path=/run/nginx.pid --error-log-path=/var/log/nginx/error.log --with-http_stub_status_module

# libav
Depending of your distro you can search for the libav/ffmpeg package if you plan to use a blackmagick card 
you must compile and install https://github.com/lu-zero/bmdtools

- Compiling X264
- git clone http://git.videolan.org/git/x264.git
- cd x264
- ./configure --enable-static
- make && make install

- Compiling libav
- git clone https://github.com/libav/libav.git
- cd libav
-  ./configure --enable-gpl --enable-libfaac --enable-libmp3lame --enable-libopencore-amrnb --enable-libopencore-amrwb --enable-libtheora --enable-libvorbis --enable-libx264 --enable-nonfree --enable-postproc --enable-version3 --enable-librtmp --enable-libxvid --enable-libass --prefix=/usr/local --enable-pthreads --disable-ffplay --disable-ffserver
 


