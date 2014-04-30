<?php

/*
 * This file is part of the Ruler package, an OpenSky project.
 *
 * (c) 2011 OpenSky Project Inc
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Ruler\Operator;

use Ruler\Context;

/**
 * A LessThanOrEqualTo comparison operator.
 *
 * @author Justin Hileman <justin@shopopensky.com>
 * @extends ComparisonOperator
 */
class LessThanOrEqualTo extends ComparisonOperator
{
    /**
     * Evaluate whether the left variable is less than or equal to the right in the current Context.
     *
     * @param Context $context Context with which to evaluate this ComparisonOperator
     *
     * @return boolean
     */
    public function evaluate(Context $context, $return = true)
    {
        if ( ! isset($this->evaluated)) {
            $this->evaluated = $this->left->prepareValue($context)->greaterThan($this->right->prepareValue($context)) === false;
        }

        return $return ? $this->evaluated : $this;
    }
}