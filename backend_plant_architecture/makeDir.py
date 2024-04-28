import pathlib
import sys

def main():
    #print ('argument list', sys.argv)
    initialPath = sys.argv[1]   # grabs the initial sessionID/fileName variable which is the name of the base directory
    mainDirectory = initialPath.rstrip(".csv")
    
    # creates full paths for all directories using passed sessionID and fileName variable
    STATISTICS_DIR = '%s/statistics' % mainDirectory
    RECONSTRUCTIONS_DIR = '%s/arbor-reconstructions' % mainDirectory
    PARETO_FRONTS_DIR = '%s/pareto-fronts' % mainDirectory
    NULL_MODELS_DIR = '%s/null-models' % mainDirectory
    FRONT_DRAWINGS_DIR = '%s/pareto-front-drawings' % mainDirectory

    # creates the directories and parent directories if needed
    pathlib.Path(RECONSTRUCTIONS_DIR).mkdir(parents=True, exist_ok=True) 
    pathlib.Path(PARETO_FRONTS_DIR).mkdir(parents=True, exist_ok=True) 
    pathlib.Path(FRONT_DRAWINGS_DIR).mkdir(parents=True, exist_ok=True) 
    pathlib.Path(STATISTICS_DIR).mkdir(parents=True, exist_ok=True) 
    pathlib.Path(NULL_MODELS_DIR).mkdir(parents=True, exist_ok=True) 


    # makes directories of all original paths, this requires the old constants file though
"""
#pathlib.Path(ORIGINAL_ROOT_NODES_DIR).mkdir(parents=True, exist_ok=True) 
#pathlib.Path(CLEANED_ROOT_NODES_DIR).mkdir(parents=True, exist_ok=True) 
pathlib.Path(RECONSTRUCTIONS_DIR).mkdir(parents=True, exist_ok=True) 
#pathlib.Path(METADATA_DIR).mkdir(parents=True, exist_ok=True) 
pathlib.Path(PARETO_FRONTS_DIR).mkdir(parents=True, exist_ok=True) 
pathlib.Path(STATISTICS_DIR).mkdir(parents=True, exist_ok=True) 
pathlib.Path(NULL_MODELS_DIR).mkdir(parents=True, exist_ok=True) 
#pathlib.Path(NULL_MODELS_PLOTS_DIR).mkdir(parents=True, exist_ok=True) 
#pathlib.Path(LOCATION_ANALYSIS_PLOTS_DIR).mkdir(parents=True, exist_ok=True) 
#pathlib.Path(ARBOR_DRAWINGS_DIR).mkdir(parents=True, exist_ok=True) 
#pathlib.Path(TOY_NETWORK_DRAWINGS_DIR).mkdir(parents=True, exist_ok=True) 
pathlib.Path(FRONT_DRAWINGS_DIR).mkdir(parents=True, exist_ok=True) 
#pathlib.Path(SCORING_DATA_DIR).mkdir(parents=True, exist_ok=True) 
"""

if __name__ == '__main__':
    main()