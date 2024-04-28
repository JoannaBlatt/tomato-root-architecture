import numpy as np

STATISTICS_DIR = '/statistics'
RECONSTRUCTIONS_DIR = '/arbor-reconstructions'
PARETO_FRONTS_DIR = '/pareto-fronts'
NULL_MODELS_DIR = '/null-models'
FRONT_DRAWINGS_DIR = '/pareto-front-drawings'
BASE_PATH = '/home/dh_an3skk/arjun-chandrasekhar-teaching.com/tomato/'

PARETO_FRONT_DELTA = 0.01
DEFAULT_ALPHAS = np.arange(0, 1 + PARETO_FRONT_DELTA, PARETO_FRONT_DELTA)

##necessary dirs: STATISTICS_DIR, RECONSTRUCTIONS_DIR, PARETO_FRONTS_DIR, NULL_MODELS_DIR, FRONT_DRAWINGS_DIR
