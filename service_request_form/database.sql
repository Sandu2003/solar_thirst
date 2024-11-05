
use service_requests;
CREATE TABLE requests (
    id INT AUTO_INCREMENT PRIMARY KEY,
    fullName VARCHAR(255) NOT NULL,
    idCard VARCHAR(255) NOT NULL,
    loanOption ENUM('yes', 'no') NOT NULL,
    paymentReceipt VARCHAR(255),
    loanReceipt VARCHAR(255),
    chosenPlan VARCHAR(255),
    customPlanText VARCHAR(255),
    lightBill VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);


