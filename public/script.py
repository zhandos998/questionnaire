import sys
import os
import pandas as pd
import json

if __name__ == "__main__":
    # f = open('people.txt','r')
    answers = open('answers.txt','r')
    questions = open('questions.txt','r')
    answers = json.loads(answers.readline())
    questions = json.loads(questions.readline())
    arr = {}
    for i in range(len(questions)):
        arr[questions[i]] = answers[i]
    df = pd.DataFrame(arr)
    df.to_excel('./teams.xlsx')