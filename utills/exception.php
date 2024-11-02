<?php


enum CustomErrorException: int
{
    case caseError = 400;
    case ExistUsername = 199;
    case passwordNotEqual = 300;
    case success = 200;
}
