from flask import Flask, request, jsonify
import joblib
import numpy as np
import logging
import os

# Configure logging
logging.basicConfig(level=logging.DEBUG)
logger = logging.getLogger(__name__)

app = Flask(__name__)

# Absolute path to the model file
model_path = r"D:\xampp\htdocs\Second-Hand Car Price Project\Preccog_SystemSECOND HAND CAR PRICE PREDICTION V2_model.pickle"

logger.debug(f"Attempting to load model from: {model_path}")

# Verify if model file exists
if not os.path.exists(model_path):
    logger.error(f"❌ Model file not found at {model_path}")
    raise FileNotFoundError(f"Model file not found at {model_path}")

try:
    model = joblib.load(model_path)  # Load using joblib
    logger.debug(f"✅ Loaded model type: {type(model)}")

    # Ensure the loaded object is a valid ML model with a `predict` method
    if not hasattr(model, 'predict'):
        logger.error("❌ Loaded object does not have a predict() method")
        raise TypeError("Loaded object is not a valid machine learning model")
except Exception as e:
    logger.error(f"❌ Error loading model: {e}")
    raise

# Enhanced mappings with more flexible matching
brand_mapping = {
    'honda': 1, 'Honda': 1, 'HONDA': 1,
    'toyota': 2, 'Toyota': 2, 'TOYOTA': 2,
    'volkswagen': 3, 'Volkswagen': 3, 'VOLKSWAGEN': 3,
    'maruti suzuki': 4, 'Maruti Suzuki': 4, 'MARUTI SUZUKI': 4,
    'bmw': 5, 'BMW': 5,
    'ford': 6, 'Ford': 6, 'FORD': 6,
    'kia': 7, 'Kia': 7, 'KIA': 7,
    'mercedes benz': 8, 'Mercedes Benz': 8, 'MERCEDES BENZ': 8,
    'hyundai': 9, 'Hyundai': 9, 'HYUNDAI': 9,
    'audi': 10, 'Audi': 10, 'AUDI': 10,
    'renault': 11, 'Renault': 11, 'RENAULT': 11,
    'mg': 12, 'MG': 12,
    'volvo': 13, 'Volvo': 13, 'VOLVO': 13,
    'skoda': 14, 'Skoda': 14, 'SKODA': 14,
    'tata': 15, 'Tata': 15, 'TATA': 15,
    'mahindra': 16, 'Mahindra': 16, 'MAHINDRA': 16,
    'mini': 17, 'Mini': 17, 'MINI': 17,
    'land rover': 18, 'Land Rover': 18, 'LAND ROVER': 18,
    'jeep': 19, 'Jeep': 19, 'JEEP': 19,
    'chevrolet': 20, 'Chevrolet': 20, 'CHEVROLET': 20,
    'jaguar': 21, 'Jaguar': 21, 'JAGUAR': 21,
    'fiat': 22, 'Fiat': 22, 'FIAT': 22,
    'aston martin': 23, 'Aston Martin': 23, 'ASTON MARTIN': 23,
    'porsche': 24, 'Porsche': 24, 'PORSCHE': 24,
    'nissan': 25, 'Nissan': 25, 'NISSAN': 25,
    'force': 26, 'Force': 26, 'FORCE': 26,
    'mitsubishi': 27, 'Mitsubishi': 27, 'MITSUBISHI': 27,
    'lexus': 28, 'Lexus': 28, 'LEXUS': 28,
    'isuzu': 29, 'Isuzu': 29, 'ISUZU': 29,
    'datsun': 30, 'Datsun': 30, 'DATSUN': 30,
    'ambassador': 31, 'Ambassador': 31, 'AMBASSADOR': 31,
    'rolls royce': 32, 'Rolls Royce': 32, 'ROLLS ROYCE': 32,
    'bajaj': 33, 'Bajaj': 33, 'BAJAJ': 33,
    'opel': 34, 'Opel': 34, 'OPEL': 34,
    'ashok': 35, 'Ashok': 35, 'ASHOK': 35,
    'bentley': 36, 'Bentley': 36, 'BENTLEY': 36,
    'ssangyong': 37, 'SsangYong': 37, 'SSANGYONG': 37,
    'maserati': 38, 'Maserati': 38, 'MASERATI': 38,
    'toyota land': 39, 'Toyota Land': 39, 'TOYOTA LAND': 39,
    'citroen': 40, 'Citroen': 40, 'CITROEN': 40,
    'lamborghini': 41, 'Lamborghini': 41, 'LAMBORGHINI': 41,
    'hummer': 42, 'Hummer': 42, 'HUMMER': 42
}

model_mapping={
    "city": 1, "City": 1, "CITY": 1,
    "innova": 2, "Innova": 2, "INNOVA": 2,
    "VentoTest": 3, "ventotest": 3, "VENTOTEST": 3,
    "Swift": 4, "swift": 4, "SWIFT": 4,
    "Baleno": 5, "baleno": 5, "BALENO": 5,
    "X3": 6, "x3": 6, "X3": 6,
    "5 Series": 7, "5 series": 7, "5 SERIES": 7,
    "maruti-suzuki-dzire": 8, "Maruti-Suzuki-Dzire": 8, "MARUTI-SUZUKI-DZIRE": 8,
    "Ecosport": 9, "ecosport": 9, "ECOSPORT": 9,
    "Alto-K10": 10, "alto-k10": 10, "ALTO-K10": 10,
    "Carnival": 11, "carnival": 11, "CARNIVAL": 11,
    "Swift-Dzire": 12, "swift-dzire": 12, "SWIFT-DZIRE": 12,
    "Corolla": 13, "corolla": 13, "COROLLA": 13,
    "GLE COUPE": 14, "gle coupe": 14, "GLE COUPE": 14,
    "Xcent": 15, "xcent": 15, "XCENT": 15,
    "Seltos": 16, "seltos": 16, "SELTOS": 16,
    "Ertiga": 17, "ertiga": 17, "ERTIGA": 17,
    "3 Series GT": 18, "3 series gt": 18, "3 SERIES GT": 18,
    "Endeavour": 19, "endeavour": 19, "ENDEAVOUR": 19,
    "Innova Crysta": 20, "innova crysta": 20, "INNOVA CRYSTA": 20,
    "A3": 21, "a3": 21, "A3": 21,
    "KWID": 22, "kwid": 22, "KWID": 22,
    "Hector": 23, "hector": 23, "HECTOR": 23,
    "Celerio": 24, "celerio": 24, "CELERIO": 24,
    "Vitara-Brezza": 25, "vitara-brezza": 25, "VITARA-BREZZA": 25,
    "2.8 Legender 4X2": 26, "2.8 legender 4x2": 26, "2.8 LEGENDER 4X2": 26,
    "S90": 27, "s90": 27, "S90": 27,
    "Venue": 28, "venue": 28, "VENUE": 28,
    "Creta": 29, "creta": 29, "CRETA": 29,
    "Alcazar": 30, "alcazar": 30, "ALCAZAR": 30,
    "i20": 31, "I20": 31, "i20": 31,
    "E-Class": 32, "e-class": 32, "E-CLASS": 32,
    "Polo": 33, "polo": 33, "POLO": 33,
    "Verna": 34, "verna": 34, "VERNA": 34,
    "A4": 35, "a4": 35, "A4": 35,
    "Fortuner": 36, "fortuner": 36, "FORTUNER": 36,
    "C-Class": 37, "c-class": 37, "C-CLASS": 37,
    "Kushaq": 38, "kushaq": 38, "KUSHAQ": 38,
    "Ciaz": 39, "ciaz": 39, "CIAZ": 39,
    "Safari": 40, "safari": 40, "SAFARI": 40,
    "BRV": 41, "brv": 41, "BRV": 41,
    "Duster": 42, "duster": 42, "DUSTER": 42,
    "Wagon-R": 43, "wagon-r": 43, "WAGON-R": 43,
    "Bolero Power Plus": 44, "bolero power plus": 44, "BOLERO POWER PLUS": 44,
    "Eon": 45, "eon": 45, "EON": 45,
    "Hector Plus": 46, "hector plus": 46, "HECTOR PLUS": 46,
    "XUV500": 47, "xuv500": 47, "XUV500": 47,
    "GLS": 48, "gls": 48, "GLS": 48,
    "i10": 49, "I10": 49, "i10": 49,
    "GLA Class": 50, "gla class": 50, "GLA CLASS": 50,
    "Carens": 51, "carens": 51, "CARENS": 51,
    "Ignis": 52, "ignis": 52, "IGNIS": 52,
    "Grand i10": 53, "grand i10": 53, "GRAND I10": 53,
    "Getz Prime": 54, "getz prime": 54, "GETZ PRIME": 54,
    "Ritz": 55, "ritz": 55, "RITZ": 55,
    "Sonet": 56, "sonet": 56, "SONET": 56,
    "GLC Coupe": 57, "glc coupe": 57, "GLC COUPE": 57,
    "Scorpio-N": 58, "scorpio-n": 58, "SCORPIO-N": 58,
    "Cooper 3 DOOR": 59, "cooper 3 door": 59, "COOPER 3 DOOR": 59,
    "Nexon": 60, "nexon": 60, "NEXON": 60,
    "Etios": 61, "etios": 61, "ETIOS": 61,
    "CrossPolo": 62, "crosspolo": 62, "CROSSPOLO": 62,
    "Vento": 63, "vento": 63, "VENTO": 63,
    "Range Rover Evoque": 64, "range rover evoque": 64, "RANGE ROVER EVOQUE": 64,
    "Indigo Ecs": 65, "indigo ecs": 65, "INDIGO ECS": 65,
    "Thar": 66, "thar": 66, "THAR": 66,
    "Camry": 67, "camry": 67, "CAMRY": 67,
    "Bolero": 68, "bolero": 68, "BOLERO": 68,
    "Brio": 69, "brio": 69, "BRIO": 69,
    "City ZX": 70, "city zx": 70, "CITY ZX": 70,
    "WRV": 71, "wrv": 71, "WRV": 71,
    "Discovery Sport": 72, "discovery sport": 72, "DISCOVERY SPORT": 72,
    "Harrier": 73, "harrier": 73, "HARRIER": 73,
    "Zest": 74, "zest": 74, "ZEST": 74,
    "Eeco": 75, "eeco": 75, "EECO": 75,
    "Swift Dzire": 76, "swift dzire": 76, "SWIFT DZIRE": 76,
    "Sx4": 77, "sx4": 77, "SX4": 77,
    "Kodiaq": 78, "kodiaq": 78, "KODIAQ": 78,
    "Altroz": 79, "altroz": 79, "ALTROZ": 79,
    "Grand i10 Nios": 80, "grand i10 nios": 80, "GRAND I10 NIOS": 80,
    "Alto-800": 81, "alto-800": 81, "ALTO-800": 81,
    "X1": 82, "x1": 82, "X1": 82,
    "X5": 83, "x5": 83, "X5": 83,
    "Rapid": 84, "rapid": 84, "RAPID": 84,
    "TUV": 85, "tuv": 85, "TUV": 85,
    "Alto K10": 86, "alto k10": 86, "ALTO K10": 86,
    "M-Class": 87, "m-class": 87, "M-CLASS": 87,
    "Glanza": 88, "glanza": 88, "GLANZA": 88,
    "Compass": 89, "compass": 89, "COMPASS": 89,
    "Omni": 90, "omni": 90, "OMNI": 90,
    "Cruze": 91, "cruze": 91, "CRUZE": 91,
    "Amaze": 92, "amaze": 92, "AMAZE": 92,
    "Jazz": 93, "jazz": 93, "JAZZ": 93,
    "Scala": 94, "scala": 94, "SCALA": 94,
    "S-Presso": 95, "s-presso": 95, "S-PRESSO": 95,
    "Tucson": 96, "tucson": 96, "TUCSON": 96,
    "Alto": 97, "alto": 97, "ALTO": 97,
    "Santa Fe": 98, "santa fe": 98, "SANTA FE": 98,
    "Dzire": 99, "dzire": 99, "DZIRE": 99,
    "ASTOR": 100, "astor": 100, "ASTOR": 100,
    "Q7": 101, "q7": 101, "Q7": 101,
    "Cooper 5 DOOR": 102, "cooper 5 door": 102, "COOPER 5 DOOR": 102,
    "Q3": 103, "q3": 103, "Q3": 103,
    "Hexa": 104, "hexa": 104, "HEXA": 104,
    "Creta Facelift": 105, "creta facelift": 105, "CRETA FACELIFT": 105,
    "7 Series": 106, "7 series": 106, "7 SERIES": 106,
    "Bolt": 107, "bolt": 107, "BOLT": 107,
    "XF": 108, "xf": 108, "XF": 108,
    "Tiago": 109, "tiago": 109, "TIAGO": 109,
    "Indigo Marina": 110, "indigo marina": 110, "INDIGO MARINA": 110,
    "Nano Genx": 111, "nano genx": 111, "NANO GENX": 111,
    "City Hybrid eHEV": 112, "city hybrid ehev": 112, "CITY HYBRID EHEV": 112,
    "Tiguan": 113, "tiguan": 113, "TIGUAN": 113,
    "G": 114, "g": 114, "G": 114,
    "3 Series": 115, "3 series": 115, "3 SERIES": 115,
    "Range Rover": 116, "range rover": 116, "RANGE ROVER": 116,
    "Grand Vitara": 117, "grand vitara": 117, "GRAND VITARA": 117,
    "XC 90": 118, "xc 90": 118, "XC 90": 118,
    "A6": 119, "a6": 119, "A6": 119,
     "Polo GTI": 120, "polo gti": 120, "POLO GTI": 120,
    "Virtus": 121, "virtus": 121, "VIRTUS": 121,
    "A-Star": 122, "a-star": 122, "A-STAR": 122,
    "Cooper S": 123, "cooper s": 123, "COOPER S": 123,
    "Etios Liva": 124, "etios liva": 124, "ETIOS LIVA": 124,
    "CLA": 125, "cla": 125, "CLA": 125,
    "XUV700": 126, "xuv700": 126, "XUV700": 126,
    "Alturas G4": 127, "alturas g4": 127, "ALTURAS G4": 127,
    "Scorpio": 128, "scorpio": 128, "SCORPIO": 128,
    "New i20": 129, "new i20": 129, "NEW I20": 129,
    "Alto 800": 130, "alto 800": 130, "ALTO 800": 130,
    "Elite i20": 131, "elite i20": 131, "ELITE I20": 131,
    "Defender": 132, "defender": 132, "DEFENDER": 132,
    "Santro Xing": 133, "santro xing": 133, "SANTRO XING": 133,
    "Linea": 134, "linea": 134, "LINEA": 134,
    "Vanquish": 135, "vanquish": 135, "VANQUISH": 135,
    "maruti-suzuki-brezza": 136, "Maruti-Suzuki-Brezza": 136, "MARUTI-SUZUKI-BREZZA": 136,
    "A8 L": 137, "a8 l": 137, "A8 L": 137,
    "V40 Cross Country": 138, "v40 cross country": 138, "V40 CROSS COUNTRY": 138,
    "Captur": 139, "captur": 139, "CAPTUR": 139,
    "Passat": 140, "passat": 140, "PASSAT": 140,
    "KUV 100": 141, "kuv 100": 141, "KUV 100": 141,
    "Bolero Neo": 142, "bolero neo": 142, "BOLERO NEO": 142,
    "Elantra": 143, "elantra": 143, "ELANTRA": 143,
    "Macan": 144, "macan": 144, "MACAN": 144,
    "Terrano": 145, "terrano": 145, "TERRANO": 145,
    "Swift-Dzire-Tour": 146, "swift-dzire-tour": 146, "SWIFT-DZIRE-TOUR": 146,
    "XL6": 147, "xl6": 147, "XL6": 147,
    "Xylo": 148, "xylo": 148, "XYLO": 148,
    "S-Class": 149, "s-class": 149, "S-CLASS": 149,
    "6 Series GT": 150, "6 series gt": 150, "6 SERIES GT": 150,
    "Figo": 151, "figo": 151, "FIGO": 151,
    "Ameo": 152, "ameo": 152, "AMEO": 152,
    "Innova Hycross": 153, "innova hycross": 153, "INNOVA HYCROSS": 153,
    "Triber": 154, "triber": 154, "TRIBER": 154,
    "Q5": 155, "q5": 155, "Q5": 155,
    "Motors FM Gurkha": 156, "motors fm gurkha": 156, "MOTORS FM GURKHA": 156,
    "Jeep": 157, "jeep": 157, "JEEP": 157,
    "718": 158, "718": 158, "718": 158,
    "Punto": 159, "punto": 159, "PUNTO": 159,
    "Corolla Altis": 160, "corolla altis": 160, "COROLLA ALTIS": 160,
    "Pajero Sport": 161, "pajero sport": 161, "PAJERO SPORT": 161,
    "Manza": 162, "manza": 162, "MANZA": 162,
    "Cooper Convertible": 163, "cooper convertible": 163, "COOPER CONVERTIBLE": 163,
    "Scorpio Classic": 164, "scorpio classic": 164, "SCORPIO CLASSIC": 164,
    "CRV": 165, "crv": 165, "CRV": 165,
    "ES": 166, "es": 166, "ES": 166,
    "GL-Class": 167, "gl-class": 167, "GL-CLASS": 167,
    "Tigor": 168, "tigor": 168, "TIGOR": 168,
    "X7": 169, "x7": 169, "X7": 169,
    "Octavia": 170, "octavia": 170, "OCTAVIA": 170,
    "Wagon R": 171, "wagon r": 171, "WAGON R": 171,
    "S-Cross": 172, "s-cross": 172, "S-CROSS": 172,
    "Gypsy": 173, "gypsy": 173, "GYPSY": 173,
    "Renault Logan": 174, "renault logan": 174, "RENAULT LOGAN": 174,
    "Boxster": 175, "boxster": 175, "BOXSTER": 175,
    "Indigo Cs": 176, "indigo cs": 176, "INDIGO CS": 176,
    "XC40": 177, "xc40": 177, "XC-40": 177,
    "Lodgy": 178, "lodgy": 178, "LODGY": 178,
    "Nano": 179, "nano": 179, "NANO": 179,
    "XC60": 180, "xc60": 180, "XC-60": 180,
    "Z4": 181, "z4": 181, "Z-4": 181,
    "Civic": 182, "civic": 182, "CIVIC": 182,
    "Urban Cruiser": 183, "urban cruiser": 183, "URBAN CRUISER": 183,
    "Brezza": 184, "brezza": 184, "BREZZA": 184,
    "Punch": 185, "punch": 185, "PUNCH": 185,
    "Cedia": 186, "cedia": 186, "CEDIA": 186,
    "GLC": 187, "glc": 187, "GLC-CLASS": 187,
    "Sonata Embera": 188, "sonata embera": 188, "SONATA EMBERA": 188,
    "Figo Aspire": 189, "figo aspire": 189, "FIGO ASPIRE": 189,
    "Accord": 190, "accord": 190, "ACCORD": 190,
    "3 DOOR": 191, "3 door": 191, "3-Door": 191,
    "MAX": 192, "max": 192, "Max": 192,
    "G Class": 193, "g class": 193, "G-CLASS": 193,
    "Indica Vista": 194, "indica vista": 194, "INDICA VISTA": 194,
    "RediGO": 195, "redigo": 195, "REDIGO": 195,
    "CLS-Class": 196, "cls-class": 196, "CLS CLASS": 196,
    "VELLFIRE": 197, "vellfire": 197, "Vellfire": 197,
    "Superb": 198, "superb": 198, "SUPERB": 198,
    "Zen-Estilo": 199, "zen-estilo": 199, "ZEN-ESTILO": 199,
    "Cooper": 200, "cooper": 200, "COOPER": 200,
    "Estilo": 201, "estilo": 201, "ESTILO": 201,
    "X4": 202, "x4": 202, "X-4": 202,
    "LX": 203, "lx": 203, "L-X": 203,
    "Enjoy": 204, "enjoy": 204, "ENJOY": 204,
    "Mobilio": 205, "mobilio": 205, "MOBILIO": 205,
    "Punto EVO": 206, "punto evo": 206, "PUNTO EVO": 206,
    "Scorpio N": 207, "scorpio n": 207, "SCORPIO N": 207,
    "D-Max V-Cross": 208, "d-max v-cross": 208, "D-MAX V-CROSS": 208,
    "Fluidic Verna": 209, "fluidic verna": 209, "FLUIDIC VERNA": 209,
    "XUV 300": 210, "xuv 300": 210, "XUV-300": 210,
    "GLE": 211, "gle": 211, "GLE-CLASS": 211,
    "GLC Class": 212, "glc class": 212, "GLC-CLASS": 212,
    "Fiesta Classic": 213, "fiesta classic": 213, "FIESTA CLASSIC": 213,
    "MUX": 214, "mux": 214, "M-U-X": 214,
    "V-Class": 215, "v-class": 215, "V CLASS": 215,
    "Safari Storme": 216, "safari storme": 216, "SAFARI STORME": 216,
    "Indica Ev2": 217, "indica ev2": 217, "INDICA EV2": 217,
    "Celerio-X": 218, "celerio-x": 218, "CELERIO-X": 218,
    "Land Cruiser": 219, "land cruiser": 219, "LAND CRUISER": 219,
    "MICRA PRIMO": 220, "micra primo": 220, "Micra Primo": 220,
    "Tavera": 221, "tavera": 221, "TAVERA": 221,
    "S-Cross1": 222, "s-cross1": 222, "S-CROSS1": 222,
    "S60": 223, "s60": 223, "S-60": 223,
    "Cayenne": 224, "cayenne": 224, "CAYENNE": 224,
    "Range Rover Sport": 225, "range rover sport": 225, "RANGE ROVER SPORT": 225,
    "Verito": 226, "verito": 226, "VERITO": 226,
    "WR-V": 227, "wr-v": 227, "WR V": 227,
    "Laura": 228, "laura": 228, "LAURA": 228,
    "800": 229, "eight hundred": 229, "EIGHT HUNDRED": 229,
    "Range Rover Velar": 230, "range rover velar": 230, "RANGE ROVER VELAR": 230,
    "Jetta": 231, "jetta": 231, "JETTA": 231}
transmission_mapping = {
    'manual': 1, 'Manual': 1, 'MANUAL': 1,
    'automatic': 2, 'Automatic': 2, 'AUTOMATIC': 2
}

owner_mapping = {
    'second': 1, 'Second': 1, 'SECOND': 1,
    'first': 2, 'First': 2, 'FIRST': 2
}

fuel_mapping = {
    'petrol': 1, 'Petrol': 1, 'PETROL': 1,
    'diesel': 2, 'Diesel': 2, 'DIESEL': 2,
    'cng': 3, 'CNG': 3,
    'hybrid': 4, 'Hybrid': 4, 'HYBRID': 4
}

@app.route('/predict', methods=['POST'])
def predict():
    try:
        data = request.get_json()
        if not data:
            logger.error("❌ No input data received")
            return jsonify({'error': 'No input data provided'}), 400

        # Extract inputs with more flexible parsing
        brand = data.get('brand', '').strip()
        model_name = data.get('model', '').strip()
        year = int(data.get('year', 0))
        age = int(data.get('age', 0))
        km_driven = float(data.get('kmDriven', 0))
        transmission = data.get('transmission', '').strip()
        owner = data.get('owner', '').strip()
        fuel_type = data.get('fuelType', '').strip()

        logger.debug(f"Input values: {data}")

        # More robust encoding with logging
        brand_encoded = brand_mapping.get(brand)
        model_encoded = model_mapping.get(model_name)
        transmission_encoded = transmission_mapping.get(transmission)
        owner_encoded = owner_mapping.get(owner)
        fuel_encoded = fuel_mapping.get(fuel_type)

        # Detailed logging for debugging
        logger.debug(f"Encoded values:")
        logger.debug(f"Brand: {brand} -> {brand_encoded}")
        logger.debug(f"Model: {model_name} -> {model_encoded}")
        logger.debug(f"Transmission: {transmission} -> {transmission_encoded}")
        logger.debug(f"Owner: {owner} -> {owner_encoded}")
        logger.debug(f"Fuel Type: {fuel_type} -> {fuel_encoded}")

        # Check if any encoding failed
        if None in (brand_encoded, model_encoded, transmission_encoded, owner_encoded, fuel_encoded):
            missing_values = {
                'Brand': brand_encoded is None,
                'Model': model_encoded is None,
                'Transmission': transmission_encoded is None,
                'Owner': owner_encoded is None,
                'Fuel Type': fuel_encoded is None
            }
            logger.error(f"Encoding failed for: {missing_values}")
            return jsonify({
                'error': 'Invalid input values', 
                'details': {k for k, v in missing_values.items() if v}
            }), 400

        # Prepare input array for prediction
        input_features = np.array([[brand_encoded, model_encoded, year, age, km_driven, transmission_encoded, owner_encoded, fuel_encoded]])

        # Make prediction
        predicted_price = model.predict(input_features)[0]
        logger.info(f"✅ Predicted Price: {predicted_price}")

        return jsonify({'predicted_price': round(predicted_price, 2)})

    except Exception as e:
        logger.error(f"❌ Prediction error: {e}", exc_info=True)
        return jsonify({'error': str(e)}), 500

if __name__ == '__main__':
    app.run(debug=True)