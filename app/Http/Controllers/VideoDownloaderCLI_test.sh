#!/bin/bash

tittle='Video Downloader CLI'
echo $tittle

# ./VideoDownloaderCLI.sh "{id: 1, user_id: 2, link: https://www.youtube.com/watch?v=lpxC8Q-0zFU&ab_channel=RonaldRodr%C3%ADguez, format: mkv}""
# ./VideoDownloaderCLI.sh "{id: 1, user_id: 5, link: https://www.youtube.com/watch?v=byQpSNrJr1Q&ab_channel=MauricioPiedraQuir%C3%B3so, format: ogg}""
# ./VideoDownloaderCLI.sh "{id: 2, user_id: 2, link: https://www.youtube.com/watch?v=byQpSNrJr1Q&ab_channel=MauricioPiedraQuir%C3%B3so, format: ogg}""
# https://www.youtube.com/watch?v=lpxC8Q-0zFU&ab_channel=RonaldRodr%C3%ADguez
# https://www.youtube.com/watch?v=9mF80O0955A&ab_channel=ELParqueCR
# https://www.youtube.com/watch?v=byQpSNrJr1Q&ab_channel=MauricioPiedraQuir%C3%B3so
# https://vimeo.com/121099472

id=''
user_id=''
link=''
format=

videoFormats=('auto' 'mp4' 'mkv' 'webm' 'flv' '3gp')
soundFormats=('mp3' 'm4a' 'acc' 'opus' 'vorbis')

ar=$*
python verifyParser.py $ar    # run an external program
if [[ $? -eq '1' ]]; then     # get the exit code of the previous execution
    if [[ $# -eq '1' ]]; then # or $# == 1
        
        a=$(echo $ar | sed -e 's/^.//' -e 's/.$//')
        a=$(echo ${a[*]} | tr ', ' "\n")
        str=()
        int=0
        for i in $a; do
            var=$(echo ${i: -1})
            if [[ $var == ':' ]]; then
                in=$(echo $i | sed -e 's/.$//')
                str[int]="$in"
            else
                str[int]="$i"
            fi
            int=$(($int + 1))
        done
        #echo ${str[*]}
        
        n=0
        for i in ${str[*]}; do
            case $i in
                'id')
                    id=${str[(($n + 1))]}
                    #echo "id: $id"
                ;;
                'user_id')
                    user_id=${str[(($n + 1))]}
                    #echo "user_id: $user_id"
                ;;
                'link')
                    link=${str[(($n + 1))]}
                    #echo "link: $link"
                ;;
                'format')
                    format=${str[(($n + 1))]}
                    #echo "format: $format"
                ;;
                *) ;;
            esac
            n=$(($n + 1))
        done
        #echo $format
    fi
    
    if [[ $n != 8 ]]; then
        echo "Format error: json don't have four values required, invalid argument"
    else
        for ((i = 0; i <= ${#videoFormats[*]}; i++)); do
            #echo ${videoFormats[i]}
            case ${format} in
                ${videoFormats[i]})
                    echo $vf
                    if [[ $format == 'auto' ]]; then
                        youtube-dl $link
                    else
                        youtube-dl -f "'"${videoFormats[i]}"'" "$link"
                        # youtube-dl "$link"
                    fi
                    echo ${videoFormats[i]}
                ;;
            esac
        done

        for ((i = 0; i <= ${#soundFormats[*]}; i++)); do
            #echo ${soundFormats[i]}
            case ${format} in
                ${soundFormats[i]})
                    youtube-dl -x -f "'"${soundFormats[i]}"'" "$link"
                    echo ${soundFormats[i]}
                ;;
            esac
        done
    fi
else
    case $1 in
        -h | --h | -help | --help)
            echo '-h, --h, -help, --help: You are here, this command explain the commands action'
            echo '-v, --v, -version, --version: show current program version'
            echo '-f, --f, -format, --format: this command would be used for expefify the format: audio or video'
        ;;
        -v | --v | -version | --version)
            echo 'VideoDownloaderCLI v01 - 10.2020'
        ;;
        -f | --f | -format | --format)
            echo 'Formats sopported:'
            echo -n 'Video: '
            n=${#videoFormats[*]}
            for ((i = 0; i <= $n; i++)); do
                if [[ $i < =$(($n - 1)) ]]; then
                    echo -n "${videoFormats[i]}, "
                else
                    echo "${videoFormats[i]}"
                fi
            done
            echo -n 'Audio: '
            n=${#soundFormats[*]}
            for ((i = 0; i <= $n; i++)); do
                if [[ $i < =$(($n - 1)) ]]; then
                    echo -n "${soundFormats[i]}, "
                else
                    echo "${soundFormats[i]}"
                fi
            done
        ;;
        *)
            echo 'Format error: arguments required, invalid argument or insert more than 1 argument'
        ;;
    esac
fi
