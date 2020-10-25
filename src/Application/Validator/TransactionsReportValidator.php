<?php

namespace AntonioTurdo\DDDExample\Application\Validator;

use AntonioTurdo\DDDExample\Application\Request\TransactionsReportRequest;

/**
 * Validates a transactions report request
 *
 * @author Antonio Turdo <antonio.turdo@gmail.com>
 */
class TransactionsReportValidator
{
    /**
     * Performs the validation checks of the request
     * 
     * @param TransactionsReportRequest $request
     * @throws \UnexpectedValueException
     */
    public function validate(TransactionsReportRequest $request): void
    {
        if (!\AntonioTurdo\DDDExample\Domain\Model\Currency::isValidKey($request->getCurrencyCode())) {
            throw new \UnexpectedValueException($request->getCurrencyCode(). ' is not a supported currency');
        }  
        
        if (!preg_match("/^\d+$/", $request->getCustomerID())) {
            throw new \UnexpectedValueException('Customer ID must be an integer');
        }          
    }
}
