#!/bin/bash
#avconv -y -i $path -acodec copy -vcodec copy -f flv $path.mp4
# rm $path
#!/bin/bash

input=""
output=""
remove_origin="FALSE"

while getopts i:o:r OPT
do
    case $OPT in
      "i" ) input="$OPTARG" ;;
      "o" ) output="$OPTARG" ;;
      "r" ) remove_origin="TRUE" ;;
     esac
done
        
if [ "$input" = "" ]; then
    exit 1
fi
if [ "$output" = "" ]; then
      output=${input%.*}.mp4
fi
                                     
echo "Input: $input"
echo "Output: $output"
                         
avconv -y -i $input -vcodec copy -acodec copy -f flv $output
                                       
if [ "$remove_origin" = "TRUE" ]; then
rm -f $input
fi
