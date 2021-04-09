str=""
extension=""
for entry in "$search_dir"student_uploads/*; 
do   
	filename="$entry"
	echo $filename
	extension="${filename#*.}"
	if [ "$extension" == "c" ]
	then
	   echo "$filename"
	   str+="$filename " 
	fi
	if [ "$extension" == "java" ]
        then
           echo "$filename"
           str+="$filename "
        fi
done
if [ "$extension" == "c" ]
	then gcc -o "student_uploads/a.out" $str
fi
if [ "$extension" == "java" ]
	then javac $str
fi
status=$?
if [ $status -eq 0 ]
then	
	exit  1 
fi
