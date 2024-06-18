from stegano import lsb









import mysql.connector

# Replace these with your actual database credentials
db_config = {
    'host': 'localhost',
    'user': 'root',
    'password': '',
    'database': 'hiddenwatermark'
}

try:
    # Connect to the database
    connection = mysql.connector.connect(**db_config)
    
    # Create a cursor object to interact with the database
    cursor = connection.cursor()

    # Fetch the last entered values from the watermarks table
    query = "SELECT image, watermarkText FROM watermarks ORDER BY id DESC LIMIT 1;"
    cursor.execute(query)
    
    # Fetch the result
    result = cursor.fetchone()

    if result:
        # result is a tuple with (image, watermarkText)
        image, watermarkText = result
        sec = lsb.hide(image,watermarkText)
        
        sec.save("sec.png")
        print("done")


    else:
        print("No records found in the watermarks table.")

except mysql.connector.Error as err:
    print(f"Error: {err}")

finally:
    # Close the cursor and connection
    if 'cursor' in locals() and cursor is not None:
        cursor.close()
    if 'connection' in locals() and connection.is_connected():
        connection.close()
