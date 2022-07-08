import React from 'react';

import memberBlock from './team-member.twig';

import memberData from './team-member.yml';

/**
 * Storybook Definition.
 */
export default { title: 'Molecules/Member Block ' };

export const MemberBlock = () => (
  <div dangerouslySetInnerHTML={{ __html: memberBlock(memberData) }} />
);
