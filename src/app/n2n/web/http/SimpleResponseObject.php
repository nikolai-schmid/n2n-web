<?php
/*
 * Copyright (c) 2012-2016, Hofmänner New Media.
 * DO NOT ALTER OR REMOVE COPYRIGHT NOTICES OR THIS FILE HEADER.
 *
 * This file is part of the N2N FRAMEWORK.
 *
 * The N2N FRAMEWORK is free software: you can redistribute it and/or modify it under the terms of
 * the GNU Lesser General Public License as published by the Free Software Foundation, either
 * version 2.1 of the License, or (at your option) any later version.
 *
 * N2N is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even
 * the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU Lesser General Public License for more details: http://www.gnu.org/licenses/
 *
 * The following people participated in this project:
 *
 * Andreas von Burg.....: Architect, Lead Developer
 * Bert Hofmänner.......: Idea, Frontend UI, Community Leader, Marketing
 * Thomas Günther.......: Developer, Hangar
 */
namespace n2n\web\http;

class SimpleResponseObject extends BufferedResponseObject {
	private $contentType;
	private $contents = '';
	/**
	 * @param unknown $contentType
	 * @param string $contents
	 */
	public function __construct($contentType, $contents = '') {
		$this->setBufferedContents($contents);
	}
	/**
	 * @param unknown $contents
	 */
	public function append($contents) {
		$this->contents .= (string) $contents;
	}
	/**
	 * @param unknown $contents
	 */
	public function appendLn($contents) {
		$this->append($contents . N2N_CRLF);
	}
	/**
	 * @param unknown $contents
	 */
	public function setBufferedContents($contents) {
		$this->contents = (string) $contents;
	}
	/* (non-PHPdoc)
	 * @see \n2n\web\http\BufferedResponseObject::getBufferedContents()
	 */
	public function getBufferedContents(): string {
		return $this->contents;
	}
	/* (non-PHPdoc)
	 * @see \n2n\web\http\ResponseObject::prepareForResponse()
	 */
	public function prepareForResponse(Response $response) {
		$response->setHeader('Content-Type: ' . $this->contentType);
	}
	/* (non-PHPdoc)
	 * @see \n2n\web\http\ResponseObject::toKownResponseString()
	 */
	public function toKownResponseString(): string {
		return 'Simple Response (' . $this->contentType . ')';
	}
}
