#!/bin/bash
for i in RocketTheme/* YOOtheme/*; do
    if [[ -d $i ]] ; then
        lsout=`ls $i`;
        if [[ $i = 'YOOtheme/YT_patch-base' ]] ; then
            continue;
        fi
        if [[ -z $lsout ]] ; then
            continue;
        fi

        for j in $i/*; do
            if [[ -d $j ]] ; then
                folder=$j
                zip=${j}.zip
                if [[ -f $zip ]] ; then
                    rm $zip
                fi
                zip -r9 $zip $folder
            fi
        done
    fi
done
