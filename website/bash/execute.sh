cd "student_uploads"
for entry in "$search_dir"student_uploads/*;
do
        filename="$entry"
        extension="${filename#*.}"
	if [ "$extension" == "c" ]
	then
		./a.out
	fi
	if [ "$extension" == "java" ]
	then
		javabin=$(grep -R 'public static void main' | cut -f 1 -d '.')
		java $javabin
	fi
done
#rm -rf "/student_uploads/" 2>/dev/null
