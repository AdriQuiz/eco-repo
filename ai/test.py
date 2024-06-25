import json



def is_jsonl(file_path):
    try:
        with open(file_path, 'r') as file:
            for line in file:
                json.loads(line)
        return True
    except (json.JSONDecodeError, UnicodeDecodeError):
        return False

file_path = 'success_cases.jsonl'
if is_jsonl(file_path):
    print('File is valid JSONL format')
else:
    print('File is not valid JSONL format')