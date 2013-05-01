#/bin/bash

#DVB-T  in test
gst-launch -p -v dvbsrc do-timestamp=true bandwidth=8 code-rate-lp=AUTO code-rate-hp=1/2 guard=4  hierarchy=AUTO  modulation="AUTO" trans-mode=AUTO inversion="AUTO" frequency=514000000 ! tsdemux name=demux program-number=8583 ! queue ! decodebin ! queue ! deinterlace ! ffmpegcolorspace ! x264enc pass=cbr threads=0 bitrate=1200 tune=zerolatency profile=baseline speed-preset=fast bframes=0 ! queue ! flvmux name=mux streamable=true ! rtmpsink location='rtmp://localhost/myapp/stream' demux. ! queue leaky=1 ! mad ! audioconvert ! audiorate ! audioresample ! faac bitrate=96000 ! audio/mpeg,mpegversion=4,stream-format=raw,framerate=25/1 ! mux.


# /dev/video0 working to optimize
gst-launch-0.10 v4l2src do-timestamp=true device=/dev/video0 ! ffmpegcolorspace ! queue ! x264enc pass=pass1 threads=0 bitrate=1536 tune=zerolatency speed-preset=fast profile=baseline subme=6 bframes=0 ! queue ! flvmux name=mux  alsasrc device-name="hw:CARD=Intel,DEV=2" ! queue ! progressreport name=progress update-freq=1 ! audioconvert ! audioresample ! faac bitrate=96000 ! audio/mpeg,mpegversion=4,stream-format=raw,framerate=25/1 ! queue ! mux. mux. ! queue ! rtmpsink location='rtmp://localhost/myapp/stream'