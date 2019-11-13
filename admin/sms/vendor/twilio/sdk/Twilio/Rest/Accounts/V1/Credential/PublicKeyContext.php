<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Rest\Accounts\V1\Credential;

use Twilio\InstanceContext;
use Twilio\Options;
use Twilio\Values;
use Twilio\Version;

class PublicKeyContext extends InstanceContext {
    /**
     * Initialize the PublicKeyContext
     * 
     * @param \Twilio\Version $version Version that contains the resource
     * @param string $sid Fetch by unique Credential Sid
     * @return \Twilio\Rest\Accounts\V1\Credential\PublicKeyContext 
     */
    public function __construct(Version $version, $sid) {
        parent::__construct($version);

        // Path Solution
        $this->solution = array('sid' => $sid, );

        $this->uri = '/Credentials/PublicKeys/' . rawurlencode($sid) . '';
    }

    /**
     * Fetch a PublicKeyInstance
     * 
     * @return PublicKeyInstance Fetched PublicKeyInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function fetch() {
        $params = Values::of(array());

        $payload = $this->version->fetch(
            'GET',
            $this->uri,
            $params
        );

        return new PublicKeyInstance($this->version, $payload, $this->solution['sid']);
    }

    /**
     * Update the PublicKeyInstance
     * 
     * @param array|Options $options Optional Arguments
     * @return PublicKeyInstance Updated PublicKeyInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function update($options = array()) {
        $options = new Values($options);

        $data = Values::of(array('FriendlyName' => $options['friendlyName'], ));

        $payload = $this->version->update(
            'POST',
            $this->uri,
            array(),
            $data
        );

        return new PublicKeyInstance($this->version, $payload, $this->solution['sid']);
    }

    /**
     * Deletes the PublicKeyInstance
     * 
     * @return boolean True if delete succeeds, false otherwise
     * @throws TwilioException When an HTTP error occurs.
     */
    public function delete() {
        return $this->version->delete('delete', $this->uri);
    }

    /**
     * Provide a friendly representation
     * 
     * @return string Machine friendly representation
     */
    public function __toString() {
        $context = array();
        foreach ($this->solution as $key => $value) {
            $context[] = "$key=$value";
        }
        return '[Twilio.Accounts.V1.PublicKeyContext ' . implode(' ', $context) . ']';
    }
}