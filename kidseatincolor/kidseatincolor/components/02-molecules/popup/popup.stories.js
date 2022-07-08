import React from 'react';

import popup from './popup.twig';

import popupData from './popup.yml';

/**
 * Storybook Definition.
 */
export default { title: 'Molecules/popup Block ' };

export const popupBlock = () => (
  <div dangerouslySetInnerHTML={{ __html: popup(popupData) }} />
);
