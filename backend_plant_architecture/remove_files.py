"""This file has a function to remove all the files in a directory.
It has a second function to go through each directory to remove the files.

"""
import os
from constants import *

def remove_files(directory):
    """removes all files from a given directory
    """
    for fname in directory:
        print("removing file:", fname)
        os.remove(directory+"/"+fname)
def remove_all_files():
    for directory in NECESSARY_DIR_LIST:
        print("directory name where files will be removed:", directory)
        remove_files(directory)
