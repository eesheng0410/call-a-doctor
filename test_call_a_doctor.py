from selenium import webdriver
from selenium.webdriver.common.by import By
from selenium.webdriver.common.keys import Keys
import time


def setup_driver(url):
    driver = webdriver.Edge()
    driver.get(url)
    return driver


def test_patient_login(driver):
    try:
        email_field = driver.find_element(By.NAME, "email")
        password_field = driver.find_element(By.NAME, "password")
        login_button = driver.find_element(By.XPATH, "//button[@type='submit']")

        email_field.send_keys("jizutilts@yahoo.com")
        password_field.send_keys("jizu0410")

        login_button.click()
        time.sleep(5)

        assert "Dashboard" in driver.title or "dashboard" in driver.current_url
        print("Test Patient Login: Passed")
    except Exception as e:
        print(f"Test Patient Login: Failed - {e}")


def test_booking_appointment(driver):
    try:
        test_patient_login(driver)
        driver.find_element(By.LINK_TEXT, "Appointment").click()
        time.sleep(3)

        clinic_select = driver.find_element(By.NAME, "clinic_id")
        date_field = driver.find_element(By.NAME, "appointment_date")
        time_field = driver.find_element(By.NAME, "appointment_time")
        service_field = driver.find_element(By.NAME, "type_of_service")
        details_field = driver.find_element(By.NAME, "details")
        submit_button = driver.find_element(By.XPATH, "//button[@type='submit']")

        clinic_select.send_keys("Clinic A")
        date_field.send_keys("2024-07-01")  # Change date as needed
        time_field.send_keys("10:00")
        service_field.send_keys("General Checkup")
        details_field.send_keys("Routine checkup.")

        submit_button.click()
        time.sleep(5)

        assert "Appointment Confirmation" in driver.page_source or "Dashboard" in driver.title
        print("Test Booking an Appointment: Passed")
    except Exception as e:
        print(f"Test Booking an Appointment: Failed - {e}")


def test_clinic_login(driver):
    try:
        driver.get("http://127.0.0.1:8000/login/clinic")
        clinic_select = driver.find_element(By.NAME, "clinic_id")
        pin_field = driver.find_element(By.NAME, "pin")
        login_button = driver.find_element(By.XPATH, "//button[@type='submit']")

        clinic_select.send_keys("1")  # Assuming Clinic A's ID is 1
        pin_field.send_keys("1234")

        login_button.click()
        time.sleep(5)

        assert "Dashboard" in driver.title or "dashboard" in driver.current_url
        print("Test Clinic Login: Passed")
    except Exception as e:
        print(f"Test Clinic Login: Failed - {e}")


def test_update_appointment_status(driver):
    try:
        test_clinic_login(driver)
        driver.find_element(By.LINK_TEXT, "Appointments").click()
        time.sleep(3)

        status_select = driver.find_element(By.NAME, "status[1]")  # Assuming appointment ID 1 exists
        status_select.send_keys("Accepted")
        update_button = driver.find_element(By.XPATH, "//button[@type='submit']")
        update_button.click()
        time.sleep(5)

        assert "Accepted" in driver.page_source
        print("Test Updating Appointment Status: Passed")
    except Exception as e:
        print(f"Test Updating Appointment Status: Failed - {e}")


def test_patient_logout(driver):
    try:
        test_patient_login(driver)
        driver.find_element(By.LINK_TEXT, "Logout").click()
        time.sleep(3)

        assert "Login Selection" in driver.title or "login-selection" in driver.current_url
        print("Test Patient Logout: Passed")
    except Exception as e:
        print(f"Test Patient Logout: Failed - {e}")


def main():
    driver = setup_driver("http://127.0.0.1:8000/login/patient")
    test_patient_login(driver)
    driver.quit()

    driver = setup_driver("http://127.0.0.1:8000/login/patient")
    test_booking_appointment(driver)
    driver.quit()

    driver = setup_driver("http://127.0.0.1:8000/login/clinic")
    test_clinic_login(driver)
    driver.quit()

    driver = setup_driver("http://127.0.0.1:8000/login/clinic")
    test_update_appointment_status(driver)
    driver.quit()

    driver = setup_driver("http://127.0.0.1:8000/login/patient")
    test_patient_logout(driver)
    driver.quit()


if __name__ == "__main__":
    main()
