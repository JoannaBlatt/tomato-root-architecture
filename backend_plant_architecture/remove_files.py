"""This file has a function to remove all the files in a directory.
It has a second function to go through each directory to remove the files.

"""
import os
from constants import *

def remove_files(directory):
    """removes all files from a given directory
    """
    for file in os.listdir(directory):
        print("removing file:", file, "from directory:",directory)
        full_name = directory+"/"+file
        os.remove(directory+"/"+file)
def remove_all_files():
    """removes files from all directories in the necessary_dir_list"""
    # print("testing with null models directory")
    # for file in os.listdir(STATISTICS_DIR):
    #     os.remove(STATISTICS_DIR+"/"+file)
    for directory in NECESSARY_DIR_LIST:
        print("directory name where files will be removed:", directory)
        remove_files(directory)
