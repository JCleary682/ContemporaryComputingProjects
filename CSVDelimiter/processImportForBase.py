#!/usr/bin/env python3
import os, sys
def processFile(szPath, szFile):
    os.chdir(szPath)
    lstFile = szFile.split(".")
    print("Opening" + szFile)
    fO = open(szFile, "r", encoding='latin-1')
    lstInput = []

    # This is the for loop that iterates over the file
    # basically this reads the text file
    for oLine in fO:
        try:
            lstLine = oLine.replace("\n", "").split("\t")
        except Exception as e:
            print(e)
            pass
        lstInput.append(lstLine)

    # End of loop
    print(szFile + " read")
    fO.close()
    # So that excel can read it
    fW = open(lstFile[0] + "Tidy.csv", "w", encoding="ascii")
    print("Opening " + lstFile[0] + "Tidy.csv")
    for oLine in lstInput:
        szWriteLine = ",".join(oLine)
        try:
            fW.write(szWriteLine + "\n")
        except Exception as e:
            print("Error on \n" + szWriteLine)
            pass
    fW.close()
    print("Complete!")
processFile(sys.argv[1], sys.argv[2])

