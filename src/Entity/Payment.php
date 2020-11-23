<?php

namespace TwigSnapper\CmSignSdk\Entity;

/**
 * Class Payment
 * @package TwigSnapper\CmSignSdk\Entity
 */
class Payment implements \JsonSerializable
{
    /**
     * @var int
     */
    private int $amount;

    /**
     * @var string
     */
    private string $currency;

    /**
     * @var string
     */
    private string $status;

    /**
     * @var string
     */
    private string $paymentMethod;

    /**
     * @var string
     */
    private string $paymentReference;

    /**
     * @return int
     */
    public function getAmount(): int
    {
        return $this->amount;
    }

    /**
     * @param int $amount
     * @return Payment
     */
    public function setAmount(int $amount): Payment
    {
        $this->amount = $amount;
        return $this;
    }

    /**
     * @return string
     */
    public function getCurrency(): string
    {
        return $this->currency;
    }

    /**
     * @param string $currency
     * @return Payment
     */
    public function setCurrency(string $currency): Payment
    {
        $this->currency = $currency;
        return $this;
    }

    /**
     * @return string
     */
    public function getStatus(): string
    {
        return $this->status;
    }

    /**
     * @param string $status
     * @return Payment
     */
    public function setStatus(string $status): Payment
    {
        $this->status = $status;
        return $this;
    }

    /**
     * @return string
     */
    public function getPaymentMethod(): string
    {
        return $this->paymentMethod;
    }

    /**
     * @param string $paymentMethod
     * @return Payment
     */
    public function setPaymentMethod(string $paymentMethod): Payment
    {
        $this->paymentMethod = $paymentMethod;
        return $this;
    }

    /**
     * @return string
     */
    public function getPaymentReference(): string
    {
        return $this->paymentReference;
    }

    /**
     * @param string $paymentReference
     * @return Payment
     */
    public function setPaymentReference(string $paymentReference): Payment
    {
        $this->paymentReference = $paymentReference;
        return $this;
    }

    /**
     * Specify data which should be serialized to JSON
     */
    public function jsonSerialize()
    {
        return [
            'amount' => $this->amount,
            'currency' => $this->currency
        ];
    }
}